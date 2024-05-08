@if (session()->has(['message', 'title', 'variant']))
<div class="absolute bottom-8 left-1/2 -translate-x-1/2 w-full max-w-screen-sm px-4" x-data="{show: true}"
  x-init="setTimeout(()=> show = false, 5000)" x-show="show">
  <sl-alert variant="{{session('variant')}}" open class="w-full">

    @if (session('variant') === 'success')
    <sl-icon slot="icon" name="check2-circle"></sl-icon>
    @elseif (session('variant') === 'danger')
    <sl-icon slot="icon" name="exclamation-octagon"></sl-icon>
    @else
    <sl-icon slot="icon" name="info-circle"></sl-icon>
    @endif

    <strong>
      {{session('title')}}
    </strong><br />
    {{session('message')}}
  </sl-alert>
</div>
@endif