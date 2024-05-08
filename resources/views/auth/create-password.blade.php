@extends('layout')
@section('content')
<div class="w-full flex justify-center pt-[20vh]">
  <form>
    <sl-card class="card-header">
      <div slot="header" class="font-bold text-center">
        Reset password
      </div>
      <div class="flex flex-col gap-4">
        <sl-input placeholder="Email" label="Email" value="{{$email}}" disabled name="email"></sl-input>
        <sl-input type="password" placeholder="Password" password-toggle label="Password" name="password"></sl-input>
      </div>
      <div slot="footer">
        <sl-button variant="primary" type="submit" class="w-full">Reset</sl-button>
      </div>
    </sl-card>
  </form>
</div>
@endsection