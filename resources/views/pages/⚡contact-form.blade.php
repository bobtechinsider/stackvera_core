<?php

use App\Models\ContactEnquiry;
use App\Notifications\NewContactEnquiry;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

new class extends Component {
    public string $name = '';

    public string $company = '';

    public string $email = '';

    public string $message = '';

    public string $website = '';

    public bool $submitted = false;

    /**
     * @return array<string, array<int, string>>
     */
    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'regex:/^.+@.+\..+$/', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    public function submit(): void
    {
        if (filled($this->website)) {
            $this->afterSubmit();

            return;
        }

        $rateLimiterKey = 'contact-form:'.request()->ip();

        if (RateLimiter::tooManyAttempts($rateLimiterKey, 5)) {
            $this->addError('email', __('Too many attempts. Please try again in a minute.'));

            return;
        }

        RateLimiter::hit($rateLimiterKey, 60);

        $validated = $this->validate();

        $enquiry = ContactEnquiry::create([
            'name' => $validated['name'],
            'company' => $validated['company'] ?: null,
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        $recipient = config('services.contact.recipient');

        if (filled($recipient)) {
            Notification::route('mail', $recipient)->notify(new NewContactEnquiry($enquiry));
        }

        $this->afterSubmit();
    }

    private function afterSubmit(): void
    {
        $this->reset(['name', 'company', 'email', 'message', 'website']);

        $this->submitted = true;
    }
}; ?>

<div>
    @if ($submitted)
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-[#00dffe]/40 bg-[#00dffe]/10 p-4 text-sm font-semibold text-[#112138]">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#00b8d4]" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.7-9.3a1 1 0 0 0-1.4-1.4L9 10.59 7.7 9.3a1 1 0 0 0-1.4 1.4l2 2a1 1 0 0 0 1.4 0l4-4Z" clip-rule="evenodd"/></svg>
            {{ __("Thanks, your message is on its way. We'll be in touch within one business day.") }}
        </div>
    @endif

    <form wire:submit="submit" class="space-y-5">
        <div class="absolute left-[-9999px]" aria-hidden="true">
            <label for="website">Website</label>
            <input id="website" wire:model="website" type="text" tabindex="-1" autocomplete="off">
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="name" class="mb-1.5 block text-sm font-semibold text-[#112138]">{{ __('Name') }}</label>
                <input id="name" wire:model="name" type="text" required
                       class="w-full rounded-xl border border-zinc-300 bg-white px-4 py-3 text-[#112138] outline-none transition focus:border-[#6304ec] focus:ring-2 focus:ring-[#6304ec]/20"
                       placeholder="Jane Doe">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="company" class="mb-1.5 block text-sm font-semibold text-[#112138]">{{ __('Company') }}</label>
                <input id="company" wire:model="company" type="text"
                       class="w-full rounded-xl border border-zinc-300 bg-white px-4 py-3 text-[#112138] outline-none transition focus:border-[#6304ec] focus:ring-2 focus:ring-[#6304ec]/20"
                       placeholder="Acme GmbH">
            </div>
        </div>
        <div>
            <label for="email" class="mb-1.5 block text-sm font-semibold text-[#112138]">{{ __('Work email') }}</label>
            <input id="email" wire:model="email" type="email" required
                   class="w-full rounded-xl border border-zinc-300 bg-white px-4 py-3 text-[#112138] outline-none transition focus:border-[#6304ec] focus:ring-2 focus:ring-[#6304ec]/20"
                   placeholder="jane@company.com">
            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="message" class="mb-1.5 block text-sm font-semibold text-[#112138]">{{ __('How can we help?') }}</label>
            <textarea id="message" wire:model="message" rows="4" required
                      class="w-full rounded-xl border border-zinc-300 bg-white px-4 py-3 text-[#112138] outline-none transition focus:border-[#6304ec] focus:ring-2 focus:ring-[#6304ec]/20"
                      placeholder="{{ __('Tell us about your project, timeline and goals…') }}"></textarea>
            @error('message') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <button type="submit" wire:loading.attr="disabled" wire:target="submit"
                class="group inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#6304ec] px-7 py-3.5 text-base font-bold text-white shadow-xl shadow-[#6304ec]/25 transition hover:-translate-y-0.5 hover:bg-[#5505c8] disabled:cursor-not-allowed disabled:opacity-70">
            <span wire:loading.remove wire:target="submit">{{ __('Send message') }}</span>
            <span wire:loading wire:target="submit">{{ __('Sending…') }}</span>
            <svg class="h-4 w-4 transition group-hover:translate-x-0.5" wire:loading.remove wire:target="submit" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 10h12m0 0-5-5m5 5-5 5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <p class="text-xs text-[#112138]/45">{{ __('By submitting, you agree to our processing of your data in line with GDPR. We never share your details.') }}</p>
    </form>
</div>
