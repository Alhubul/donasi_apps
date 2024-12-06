<?php

namespace App\Filament\Resources\DonorResource\Pages;

use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;
use App\Models\Donor;

class ManageDonors extends ManageRecords
{
    protected static string $resource = \App\Filament\Resources\DonorResource::class;

    // Gunakan trait untuk menangani operasi API
    // use \Filament\Resources\Pages\Concerns\InteractsWithRecord;
    protected ?string $record = null;
    // Ganti metode getTableQuery
    protected function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        return \App\Models\Donor::query()->whereRaw('1=1'); // Dummy query
    }

    // Override metode untuk mengambil data
    public function getTableRecords(): \Illuminate\Contracts\Pagination\Paginator
    {
        try {
            $response = Http::get(config('app.api_url') . '/donors');

            if ($response->successful()) {
                // Convert API data into model instances
                $data = collect($response->json('data', []));
                $donors = Donor::hydrate($data->toArray()); // Hydrate the data to model instances

                return new \Illuminate\Pagination\LengthAwarePaginator(
                    $donors, // Return hydrated models
                    $donors->count(),
                    15, // items per page
                    request()->get('page', 1)
                );
            }

            Notification::make()
                ->title('Failed to fetch donors')
                ->danger()
                ->send();

            return new \Illuminate\Pagination\LengthAwarePaginator(
                collect([]),
                0,
                15,
                1
            );
        } catch (\Exception $e) {
            Notification::make()
            ->title('Error fetching donors: ' . $e->getMessage())
            ->danger()
            ->send();

            return new \Illuminate\Pagination\LengthAwarePaginator(
                collect([]),
                0,
                15,
                1
            );
        }
    }
    // Metode untuk membuat donor melalui API
    public function create(): void
    {
        $data = $this->form->getState();

        try {
            $response = Http::post(config('app.api_url') . '/donors', $data);

            if ($response->successful()) {
                Notification::make()
                    ->title('Donor created successfully')
                    ->success()
                    ->send();

                $this->redirect(static::getResource()::getUrl('index'));
            } else {
                Notification::make()
                    ->title('Failed to create donor')
                    ->body($response->body())
                    ->danger()
                    ->send();
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error creating donor')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    // Metode untuk memperbarui donor melalui API
    public function update($record = null): void
    {
        $data = $this->form->getState();

        // Gunakan record yang diberikan atau record saat ini
        $record = $record ?? $this->record;

        try {
            $response = Http::put(config('app.api_url') . "/donors/{$record['id']}", $data);

            if ($response->successful()) {
                Notification::make()
                    ->title('Donor updated successfully')
                    ->success()
                    ->send();

                $this->redirect(static::getResource()::getUrl('index'));
            } else {
                Notification::make()
                    ->title('Failed to update donor')
                    ->body($response->body())
                    ->danger()
                    ->send();
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error updating donor')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }

    // Metode untuk menghapus donor melalui API
    public function delete($record = null): void
    {
        // Gunakan record yang diberikan atau record saat ini
        $record = $record ?? $this->record;

        try {
            $response = Http::delete(config('app.api_url') . "/donors/{$record['id']}");

            if ($response->successful()) {
                Notification::make()
                    ->title('Donor deleted successfully')
                    ->success()
                    ->send();

                $this->redirect(static::getResource()::getUrl('index'));
            } else {
                Notification::make()
                    ->title('Failed to delete donor')
                    ->body($response->body())
                    ->danger()
                    ->send();
            }
        } catch (\Exception $e) {
            Notification::make()
                ->title('Error deleting donor')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
}
