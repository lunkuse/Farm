<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('manageSaleRecord.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.manageSaleRecord.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="manageSaleRecord.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('manageSaleRecord.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageSaleRecord.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('animal_tag') ? 'invalid' : '' }}">
        <label class="form-label required" for="animal_tag">{{ trans('cruds.manageSaleRecord.fields.animal_tag') }}</label>
        <x-select-list class="form-control" required id="animal_tag" name="animal_tag" wire:model="animal_tag" :options="$this->listsForFields['animal_tag']" multiple />
        <div class="validation-message">
            {{ $errors->first('animal_tag') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageSaleRecord.fields.animal_tag_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageSaleRecord.quantity') ? 'invalid' : '' }}">
        <label class="form-label required" for="quantity">{{ trans('cruds.manageSaleRecord.fields.quantity') }}</label>
        <input class="form-control" type="number" name="quantity" id="quantity" required wire:model.defer="manageSaleRecord.quantity" step="1">
        <div class="validation-message">
            {{ $errors->first('manageSaleRecord.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageSaleRecord.fields.quantity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageSaleRecord.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.manageSaleRecord.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="manageSaleRecord.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('manageSaleRecord.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageSaleRecord.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sale_purpose') ? 'invalid' : '' }}">
        <label class="form-label" for="sale_purpose">{{ trans('cruds.manageSaleRecord.fields.sale_purpose') }}</label>
        <x-select-list class="form-control" id="sale_purpose" name="sale_purpose" wire:model="sale_purpose" :options="$this->listsForFields['sale_purpose']" multiple />
        <div class="validation-message">
            {{ $errors->first('sale_purpose') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageSaleRecord.fields.sale_purpose_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.manage-sale-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>