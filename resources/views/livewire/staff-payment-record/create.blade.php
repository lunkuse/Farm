<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('staffPaymentRecord.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.staffPaymentRecord.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="staffPaymentRecord.name">
        <div class="validation-message">
            {{ $errors->first('staffPaymentRecord.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staffPaymentRecord.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('staffPaymentRecord.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.staffPaymentRecord.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="staffPaymentRecord.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('staffPaymentRecord.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.staffPaymentRecord.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.staff-payment-records.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>