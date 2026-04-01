@if (count($errors) > 0)
<div class="mb-4 bg-red-50 border border-red-200 rounded-md p-4">
  <div class="font-medium text-red-700">
    {{ __('入力内容に問題があります') }}
  </div>

  <ul class="mt-3 list-disc list-inside text-sm text-red-600">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
