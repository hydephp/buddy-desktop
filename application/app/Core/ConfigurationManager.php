<?php

namespace App\Core;

class ConfigurationManager implements Contracts\BuddyConfiguration
{
    public object $configuration;

    public function __construct()
    {
        $this->loadConfigurationObject();
    }

    public function loadConfigurationObject(): self
    {
        $this->load();

        return $this;
    }

    public function storeConfigurationObject(): self
    {
        $this->persist();

        return $this;
    }

    public function initializeConfigurationObject(): self
    {
        $this->configuration = new \stdClass();

        if (BuddyFacade::hyde()->getPath()) {
            $this->configuration->path = BuddyFacade::hyde()->getPath();
        }

        $this->storeConfigurationObject();

        return $this;
    }


    public function getConfigurationObject(): object
    {
        return $this->configuration;
    }

    public function get(): object
    {
        return $this->getConfigurationObject();
    }

    public function getConfigurationFilePath(): string
    {
        return storage_path('project.json');
    }

    public function getJson(): string
    {
        return json_encode($this->get(), JSON_PRETTY_PRINT);
    }

    protected function load(): void
    {
        if (file_exists($this->getConfigurationFilePath())) {
            $this->configuration = json_decode(file_get_contents($this->getConfigurationFilePath()));
        } else {
            $this->initializeConfigurationObject();
        }
    }

    protected function persist(): void
    {
        file_put_contents($this->getConfigurationFilePath(), $this->getJson());
    }
}
