<div class="form-group">
    <div class="row d-flex justify-content-around">
        <div class="col-md-6">
            <label class="col-md-2 col-form-label" for="">{{ trans( "consultations.saturday") }}</label>
            <input type="text" autocomplete="off" name="consultationsavailability[saturday][start_date]start_date" class="form-control time" id="start_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['saturday']) ? $item->consultationsavailability->keyBy('day')['saturday']->start_date : '' }}"  placeholder="{{ trans("consultations.start_date")}}">
            <input type="text" autocomplete="off" name="consultationsavailability[saturday][end_date]end_date" class="form-control time" id="end_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['saturday']) ? $item->consultationsavailability->keyBy('day')['saturday']->end_date : '' }}"  placeholder="{{ trans("consultations.end_date")}}">
        </div>
        <div class="col-md-6">
            <label class="col-md-2 col-form-label" for="">{{ trans( "consultations.sunday") }}</label>
            <input type="text" autocomplete="off" name="consultationsavailability[sunday][start_date]start_date" class="form-control time" id="start_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['sunday']) ? $item->consultationsavailability->keyBy('day')['sunday']->start_date : '' }}"  placeholder="{{ trans("consultations.start_date")}}">
            <input type="text" autocomplete="off" name="consultationsavailability[sunday][end_date]end_date" class="form-control time" id="end_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['sunday']) ? $item->consultationsavailability->keyBy('day')['sunday']->end_date : '' }}"  placeholder="{{ trans("consultations.end_date")}}">
        </div>
        <div class="col-md-6">
            <label class="col-md-2 col-form-label" for="">{{ trans( "consultations.monday") }}</label>
            <input type="text" autocomplete="off" name="consultationsavailability[monday][start_date]start_date" class="form-control time" id="start_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['monday']) ? $item->consultationsavailability->keyBy('day')['monday']->start_date : '' }}"  placeholder="{{ trans("consultations.start_date")}}">
            <input type="text" autocomplete="off" name="consultationsavailability[monday][end_date]end_date" class="form-control time" id="end_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['monday']) ? $item->consultationsavailability->keyBy('day')['monday']->end_date : '' }}"  placeholder="{{ trans("consultations.end_date")}}">
        </div>
        <div class="col-md-6">
            <label class="col-md-2 col-form-label" for="">{{ trans( "consultations.tuesday") }}</label>
            <input type="text" autocomplete="off" name="consultationsavailability[tuesday][start_date]start_date" class="form-control time" id="start_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['tuesday']) ? $item->consultationsavailability->keyBy('day')['saturday']->start_date : '' }}"  placeholder="{{ trans("consultations.start_date")}}">
            <input type="text" autocomplete="off" name="consultationsavailability[tuesday][end_date]end_date" class="form-control time" id="end_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['tuesday']) ? $item->consultationsavailability->keyBy('day')['tuesday']->end_date : '' }}"  placeholder="{{ trans("consultations.end_date")}}">
        </div>
        <div class="col-md-6">
            <label class="col-md-2 col-form-label" for="">{{ trans( "consultations.wednesday") }}</label>
            <input type="text" autocomplete="off" name="consultationsavailability[wednesday][start_date]start_date" class="form-control time" id="start_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['wednesday']) ? $item->consultationsavailability->keyBy('day')['wednesday']->start_date : '' }}"  placeholder="{{ trans("consultations.start_date")}}">
            <input type="text" autocomplete="off" name="consultationsavailability[wednesday][end_date]end_date" class="form-control time" id="end_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['wednesday']) ? $item->consultationsavailability->keyBy('day')['wednesday']->end_date : '' }}"  placeholder="{{ trans("consultations.end_date")}}">
        </div>
        <div class="col-md-6">
            <label class="col-md-2 col-form-label" for="">{{ trans( "consultations.thursday") }}</label>
            <input type="text" autocomplete="off" name="consultationsavailability[thursday][start_date]start_date" class="form-control time" id="start_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['thursday']) ? $item->consultationsavailability->keyBy('day')['thursday']->start_date : '' }}"  placeholder="{{ trans("consultations.start_date")}}">
            <input type="text" autocomplete="off" name="consultationsavailability[thursday][end_date]end_date" class="form-control time" id="end_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['thursday']) ? $item->consultationsavailability->keyBy('day')['thursday']->end_date : '' }}"  placeholder="{{ trans("consultations.end_date")}}">
        </div>
        <div class="col-md-12">
            <label class="col-md-2 col-form-label" for="">{{ trans( "consultations.friday") }}</label>
            <input type="text" autocomplete="off" name="consultationsavailability[friday][start_date]start_date" class="form-control time" id="start_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['friday']) ? $item->consultationsavailability->keyBy('day')['friday']->start_date : '' }}"  placeholder="{{ trans("consultations.start_date")}}">
            <input type="text" autocomplete="off" name="consultationsavailability[friday][end_date]end_date" class="form-control time" id="end_date" value="{{ isset($item) && isset($item->consultationsavailability->keyBy('day')['friday']) ? $item->consultationsavailability->keyBy('day')['friday']->end_date : '' }}"  placeholder="{{ trans("consultations.end_date")}}">
        </div>
    </div>
</div>