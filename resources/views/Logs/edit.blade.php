@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="/css/wickedpicker.min.css">
@endsection

@section('content')

<h2 class="pb-3">勉強を記録する</h2>
<div class="log-create-container">

  <div class="log-create__img">
    <img id="materialImg" src="{{ $givenMaterial->image }}" alt="">
  </div>

  <div class="log-create__form">
    <form action="/logs/{{ $log->id }}/edit" method="POST">
      @csrf
      <h3 class="log-create__item">教材</h3>
      <div class="form-group log-form">
        <input type="text" class="form-control" id="material" value="{{ $givenMaterial->material_name }}" disabled>
        <a data-toggle="modal" data-target="#exampleModalLong" href="javascript:void(0)"><i
            class="fas fa-caret-right mr-1"></i>教材を選択する</a>
      </div>
      <input type="hidden" id="material_id" name="material_id" value="{{ $log->material_id }}">
      <!--日付-->
      <h3 class="log-create__item">学習日</h3>
      <div class="form-group log-form log-form--horizontal d-inline-block">
        <label for="date">日付</label>
        <input type="text" class="form-control" id="date" placeholder="日付を選択してください" value="{{ $date }}">
      </div>
      <!--時刻-->
      <div class="form-group log-form d-inline-block">
        <label for="time">時刻</label>
        <input type="text" class="form-control timepicker" id="time" placeholder="時刻">
      </div>
      <!--時刻をtimestamp型に変換-->
      <input type="hidden" name="datetime" id="datetime" value="">
      <!--勉強時間-->
      <h3 class="log-create__item">勉強時間</h3>
      <div class="form-group log-form d-inline-block">
        {{-- <label for="inlineFormCustomSelect">時間</label> --}}
        <select class="custom-select mr-sm-2" name="study_hour" id="">
          <option>0</option>
          @for ($i = 1; $i < 24; $i++) @if ($i==$log->study_hour)
            <option selected value="{{ $i }}">{{ $i }}</option>
            @endif
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <span class="text-muted">時間</span>
      </div>
      <div class="form-group log-form d-inline-block">
        {{-- <label for="inlineFormCustomSelect">分</label> --}}
        <select class="custom-select mr-sm-2" name="study_minute" id="">
          <option>0</option>
          @for ($i = 1; $i < 60; $i++) <option value="{{ $i }}">{{ $i }}</option>
            @if ($i == $log->study_minute)
            <option selected value="{{ $i }}">{{ $i }}</option>
            @endif
            @endfor
        </select>
        <span class="text-muted">分</span>
      </div>
      <h3 class="log-create__item">コメント</h3>
      <div class="form-group log-form">
        <textarea class="form-control" name="comment" rows="3">{{ $log->comment }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">記録する</button>
    </form>
  </div>

</div>
</div>

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button> --}}

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">教材を選択</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach ($categories as $category)
        <div class="modal-materials-cat">
          <h4>{{ $category->category_name }}</h4>
          <div class="materials-wrap">

            @foreach ($materials as $material)
            @if ($category->id == $material->category_id)
            <div class="material-block">
              <a class="d-block jsMaterial" href="javascript:void(0)" id="materialId_{{ $material->id }}">
                <div class="modal-material__img">
                  <img id="materialImg_{{ $material->id }}" src="/storage/{{ $material->image }}" alt="">
                </div>
                <small class="text-mued" id="materialName_{{ $material->id }}">{{ $material->material_name }}</small>
              </a>
            </div>
            @endif
            @endforeach
          </div>

        </div>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
      </div>
    </div>
  </div>
</div>

<!-- 教材選択 -->
{{-- <div id="materialModal" class="material-modal">
  <div class="modal-block mx-auto p-3">
    <h3>教材を選択</h3>
    <div class="modal-materials">
      @foreach ($categories as $category)
      <div class="modal-materials-cat">
        <h4>{{ $category->category_name }}</h4>
        <div class="materials-wrap">

          @foreach ($materials as $material)
          @if ($category->id == $material->category_id)
          <div class="material-block">
            <a class="d-block jsMaterial" href="javascript:void(0)" id="materialId_{{ $material->id }}">
              <div class="modal-material__img">
                <img id="materialImg_{{ $material->id }}" src="/storage/{{ $material->image }}" alt="">
              </div>
              <small class="text-mued" id="materialName_{{ $material->id }}">{{ $material->material_name }}</small>
            </a>
          </div>
          @endif
          @endforeach
        </div>

      </div>
      @endforeach


    </div>
    <div id="modalClose">
      <a href="javascript:void(0)">
        <i class="fas fa-times mr-1"></i>
        閉じる
      </a>
    </div>
  </div>
</div> --}}

  <script src="/js/material.js"></script>

  @endsection

  @section('script')
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
  <script src="/js/wickedpicker.js"></script>
  <script>
    //valに元のdatetimeを渡しておく
  const givenDate = @json($date);
  const givenTime = @json($time);
    console.log(givenDate);
  let dateTimeValue = givenDate + " " + givenTime;
  const datetime = document.getElementById('datetime');
  datetime.setAttribute("value", dateTimeValue);
      //日付操作

      function removeSpace(str) {
        str = str.replace(/\s+/g, "");
        return str;
    }

    function setDatetimeValue() {
        let date = document.getElementById('date').value;
        let time = document.getElementById('time').value;
        time = removeSpace(time);
        let datetimeval = `${date} ${time}`;
        datetime.setAttribute("value", datetimeval);
    }

    date.onchange = function() {
	    setDatetimeValue(date, time);
    }
    time.onchange = function() {
	    setDatetimeValue(date, time);
    }

  flatpickr("#date", {
        locale:"ja",
        maxDate:"today",
        dateFormat: "Y-m-d",
    });
   
    let options = {
        // now: today.getHours() + ':' + today.getMinutes(),
        now: givenTime,
        twentyFour: true,
        upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
        downArrow: 'wickedpicker__controls__control-down',
    }
    $('.timepicker').wickedpicker(options);

  </script>
  @endsection