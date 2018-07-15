<?php
namespace router\link;

/**
 * A link containes out of get parameters
 *
 * @author kevinfrantz
 *        
 */
final class Link implements LinkInterface
{

    /**
     * ArrayCollection would be nicer but I have to save time ;)
     *
     * @var array
     */
    private $parameters;

    /**
     *
     * @var string
     */
    private $name;

    public function __construct(array $parameters = [], string $name = '')
    {
        $this->setParameters($parameters);
        $this->setName($name);
    }

    public function setParameters(array $parameters): void
    {
        $this->parameters = $parameters;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return "index.php" . $this->getParameters();
    }

    private function getParameters(): string
    {
        $parameters = '?';
        foreach ($this->parameters as $key => $value) {
            $parameters .= $key . '=' . $value . '&';
        }
        return $parameters;
    }

    public function isActive(): bool
    {
        foreach ($this->parameters as $key => $parameter) {
            if (! array_key_exists($key, $_GET) || (array_key_exists($key, $_GET) && $_GET[$key]!==$parameter)) {
                return false;
            }
        }
        return true;
    }
}

