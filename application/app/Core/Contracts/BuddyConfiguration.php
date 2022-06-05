<?php

namespace App\Core\Contracts;

interface BuddyConfiguration
{
    /**
     * Persist the configuration object.
     */
    public function loadConfigurationObject(): self;

    /**
     * Load the persisted configuration object.
     *
     * If a configuration has not been persisted
     * return a new configuration object instead.
     */
    public function storeConfigurationObject(): self;

    /**
     * Initialize a new base configuration object.
     */
    public function initializeConfigurationObject(): self;

    /**
     * Get the configuration object.
     */
    public function getConfigurationObject(): object;
}
