<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('manageExpense.date') ? 'invalid' : '' }}">
        <label class="form-label required" for="date">{{ trans('cruds.manageExpense.fields.date') }}</label>
        <x-date-picker class="form-control" required wire:model="manageExpense.date" id="date" name="date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('manageExpense.date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageExpense.fields.date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageExpense.expenditure_type_id') ? 'invalid' : '' }}">
        <label class="form-label" for="expenditure_type">{{ trans('cruds.manageExpense.fields.expenditure_type') }}</label>
        <x-select-list class="form-control" id="expenditure_type" name="expenditure_type" :options="$this->listsForFields['expenditure_type']" wire:model="manageExpense.expenditure_type_id" />
        <div class="validation-message">
            {{ $errors->first('manageExpense.expenditure_type_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageExpense.fields.expenditure_type_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageExpense.quantity') ? 'invalid' : '' }}">
        <label class="form-label" for="quantity">{{ trans('cruds.manageExpense.fields.quantity') }}</label>
        <input class="form-control" type="text" name="quantity" id="quantity" wire:model.defer="manageExpense.quantity">
        <div class="validation-message">
            {{ $errors->first('manageExpense.quantity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageExpense.fields.quantity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageExpense.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.manageExpense.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="manageExpense.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('manageExpense.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageExpense.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageExpense.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.manageExpense.fields.comments') }}</label>
        <textarea class="form-control" name="comments" id="comments" wire:model.defer="manageExpense.comments" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('manageExpense.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageExpense.fields.comments_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('manageExpense.attendant_id') ? 'invalid' : '' }}">
        <label class="form-label" for="attendant">{{ trans('cruds.manageExpense.fields.attendant') }}</label>
        <x-select-list class="form-control" id="attendant" name="attendant" :options="$this->listsForFields['attendant']" wire:model="manageExpense.attendant_id" />
        <div class="validation-message">
            {{ $errors->first('manageExpense.attendant_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.manageExpense.fields.attendant_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.manage-expenses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>