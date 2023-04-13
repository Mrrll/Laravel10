<div class="modal fade" id="{{$id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div {{ $attributes->merge(['class' => "modal-dialog $class"]) }}>
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">
            {{$title}}
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{$slot}}
      </div>
      <div class="modal-footer">
        {{$footer}}
      </div>
    </div>
  </div>
</div>
