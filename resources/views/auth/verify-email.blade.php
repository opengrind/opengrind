<x-guest-layout>

  <img src="img/logo.svg" alt="logo" class="text-center mx-auto mb-4 block">

  <div class="mb-4 text-gray-600 dark:text-gray-400">
    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?') }}
  </div>

  <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('If you didn\'t receive the email, we will gladly send you another.') }}
  </div>

  @if (session('status') == 'verification-link-sent')
  <div class="mb-8 font-medium text-sm text-green-600 dark:text-green-400 border rounded-lg p-5 border-green-200 bg-emerald-50">
    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
  </div>
  @endif

  <div class="mt-4 flex items-center justify-between">
    <form method="POST" action="{{ route('verification.send') }}">
      @csrf

      <div>
        <x-button-form>
          {{ __('Resend verification email') }}
        </x-button-form>
      </div>
    </form>

    <form method="POST" action="{{ route('logout') }}">
      @csrf

      <x-button-as-link>{{ __('Log out') }}</x-button-as-link>
    </form>
  </div>
</x-guest-layout>
