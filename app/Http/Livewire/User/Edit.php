<?php

namespace App\Http\Livewire\User;

use App\Models\HealthCondition;
use App\Models\Role;
use App\Models\Skill;
use App\Models\SpiritialAffiliation;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public User $user;

    public array $roles = [];

    public array $skill = [];

    public string $password = '';

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public array $health_condition = [];

    public array $spiritual_affiliation = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->user->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(User $user)
    {
        $this->user                  = $user;
        $this->roles                 = $this->user->roles()->pluck('id')->toArray();
        $this->health_condition      = $this->user->healthCondition()->pluck('id')->toArray();
        $this->spiritual_affiliation = $this->user->spiritualAffiliation()->pluck('id')->toArray();
        $this->skill                 = $this->user->skill()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'user_profile_picture' => $user->profile_picture,

            'user_identification_copy' => $user->identification_copy,

            'user_other_files' => $user->other_files,

        ];
    }

    public function render()
    {
        return view('livewire.user.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->save();
        $this->user->roles()->sync($this->roles);
        $this->user->healthCondition()->sync($this->health_condition);
        $this->user->spiritualAffiliation()->sync($this->spiritual_affiliation);
        $this->user->skill()->sync($this->skill);
        $this->syncMedia();

        return redirect()->route('admin.users.index');
    }

    protected function rules(): array
    {
        return [
            'mediaCollections.user_profile_picture' => [
                'array',
                'nullable',
            ],
            'mediaCollections.user_profile_picture.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'user.name' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.locale' => [
                'string',
                'nullable',
            ],
            'user.date_of_birth' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'user.identification' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['identification'])),
            ],
            'mediaCollections.user_identification_copy' => [
                'array',
                'nullable',
            ],
            'mediaCollections.user_identification_copy.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'user.emergency_contact_1' => [
                'string',
                'nullable',
            ],
            'user.emergency_contact_2' => [
                'string',
                'nullable',
            ],
            'user.emergency_contact_3' => [
                'string',
                'nullable',
            ],
            'user.district' => [
                'string',
                'nullable',
            ],
            'user.parish' => [
                'string',
                'nullable',
            ],
            'user.village' => [
                'string',
                'nullable',
            ],
            'user.sub_county' => [
                'string',
                'nullable',
            ],
            'health_condition' => [
                'array',
            ],
            'health_condition.*.id' => [
                'integer',
                'exists:health_conditions,id',
            ],
            'user.other_health_condition' => [
                'string',
                'nullable',
            ],
            'spiritual_affiliation' => [
                'required',
                'array',
            ],
            'spiritual_affiliation.*.id' => [
                'integer',
                'exists:spiritial_affiliations,id',
            ],
            'user.other_spiritual_affiliation' => [
                'string',
                'nullable',
            ],
            'skill' => [
                'array',
            ],
            'skill.*.id' => [
                'integer',
                'exists:skills,id',
            ],
            'user.other_skill' => [
                'string',
                'nullable',
            ],
            'user.notes' => [
                'string',
                'nullable',
            ],
            'mediaCollections.user_other_files' => [
                'array',
                'nullable',
            ],
            'mediaCollections.user_other_files.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'user.is_approved' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['roles']                 = Role::pluck('title', 'id')->toArray();
        $this->listsForFields['identification']        = $this->user::IDENTIFICATION_SELECT;
        $this->listsForFields['health_condition']      = HealthCondition::pluck('title', 'id')->toArray();
        $this->listsForFields['spiritual_affiliation'] = SpiritialAffiliation::pluck('title', 'id')->toArray();
        $this->listsForFields['skill']                 = Skill::pluck('title', 'id')->toArray();
    }
}
