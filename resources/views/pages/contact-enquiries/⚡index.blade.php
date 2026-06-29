<?php

use App\Models\ContactEnquiry;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Contact enquiries')] class extends Component {
    use WithPagination;

    /**
     * @return LengthAwarePaginator<int, ContactEnquiry>
     */
    #[Computed]
    public function enquiries(): LengthAwarePaginator
    {
        return ContactEnquiry::query()
            ->latest()
            ->paginate(15);
    }

    public function markAsRead(int $enquiryId): void
    {
        ContactEnquiry::findOrFail($enquiryId)->markAsRead();

        unset($this->enquiries);
    }

    public function delete(int $enquiryId): void
    {
        ContactEnquiry::findOrFail($enquiryId)->delete();

        unset($this->enquiries);
    }
}; ?>

<section class="flex h-full w-full flex-1 flex-col gap-6">
        <flux:heading size="xl">{{ __('Contact enquiries') }}</flux:heading>

        @if ($this->enquiries->isEmpty())
            <flux:callout icon="inbox">
                <flux:callout.heading>{{ __('No enquiries yet') }}</flux:callout.heading>
                <flux:callout.text>{{ __('Submissions from the landing page contact form will appear here.') }}</flux:callout.text>
            </flux:callout>
        @else
            <flux:table :paginate="$this->enquiries">
                <flux:table.columns>
                    <flux:table.column>{{ __('Received') }}</flux:table.column>
                    <flux:table.column>{{ __('Name') }}</flux:table.column>
                    <flux:table.column>{{ __('Company') }}</flux:table.column>
                    <flux:table.column>{{ __('Email') }}</flux:table.column>
                    <flux:table.column>{{ __('Message') }}</flux:table.column>
                    <flux:table.column>{{ __('Status') }}</flux:table.column>
                    <flux:table.column></flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @foreach ($this->enquiries as $enquiry)
                        <flux:table.row :key="$enquiry->id">
                            <flux:table.cell class="whitespace-nowrap">{{ $enquiry->created_at->timezone('Europe/Berlin')->format('d.m.Y H:i') }}</flux:table.cell>
                            <flux:table.cell variant="strong">{{ $enquiry->name }}</flux:table.cell>
                            <flux:table.cell>{{ $enquiry->company ?? '—' }}</flux:table.cell>
                            <flux:table.cell>
                                <flux:link href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</flux:link>
                            </flux:table.cell>
                            <flux:table.cell class="max-w-xs truncate" :title="$enquiry->message">{{ $enquiry->message }}</flux:table.cell>
                            <flux:table.cell>
                                @if ($enquiry->isUnread())
                                    <flux:badge color="amber" size="sm">{{ __('Unread') }}</flux:badge>
                                @else
                                    <flux:badge color="green" size="sm">{{ __('Read') }}</flux:badge>
                                @endif
                            </flux:table.cell>
                            <flux:table.cell>
                                <div class="flex items-center justify-end gap-2">
                                    @if ($enquiry->isUnread())
                                        <flux:button size="sm" variant="ghost" icon="check" wire:click="markAsRead({{ $enquiry->id }})">
                                            {{ __('Mark read') }}
                                        </flux:button>
                                    @endif

                                    <flux:button
                                        size="sm"
                                        variant="ghost"
                                        icon="trash"
                                        wire:click="delete({{ $enquiry->id }})"
                                        wire:confirm="{{ __('Delete this enquiry?') }}"
                                    />
                                </div>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforeach
                </flux:table.rows>
            </flux:table>
        @endif
</section>
