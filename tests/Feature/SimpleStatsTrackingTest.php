<?php

use Illuminate\Support\Collection;
use SimpleStatsIo\LaravelClient\Storage\CacheTrackingStorage;
use SimpleStatsIo\LaravelClient\Storage\TrackingStorage;

/**
 * SimpleStats stores its per-request tracking data as a Collection. The package
 * demands it back as a Collection (CacheTrackingStorage::get(): Collection), so
 * the cache must be allowed to rehydrate that class. Laravel hardens the cache
 * by refusing to unserialize objects (cache.serializable_classes => false),
 * which would turn the Collection into a __PHP_Incomplete_Class and break login.
 */
it('uses the cache tracking storage, which survives this app json session serialization', function () {
    expect(config('simplestats-client.tracking_storage'))->toBe('cache');
    expect(app(TrackingStorage::class))->toBeInstanceOf(CacheTrackingStorage::class);
});

it('allows tracking Collections to be rehydrated from the cache', function () {
    // Mirror exactly how Laravel's cache gates unserialization.
    $allowedClasses = config('cache.serializable_classes');

    $restored = unserialize(
        serialize(collect(['ip' => '127.0.0.1'])),
        ['allowed_classes' => $allowedClasses],
    );

    expect($restored)->toBeInstanceOf(Collection::class);
});

it('still blocks arbitrary classes from being rehydrated from the cache', function () {
    $allowedClasses = config('cache.serializable_classes');

    $restored = unserialize(
        serialize(new stdClass),
        ['allowed_classes' => $allowedClasses],
    );

    expect($restored)->toBeInstanceOf(__PHP_Incomplete_Class::class);
});
