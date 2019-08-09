<?php

declare(strict_types=1);

namespace Deviantintegral\Har;

use JMS\Serializer\Annotation as Serializer;

final class PageTiming
{
    /**
     * Content of the page loaded. Number of milliseconds since page load
     * started (page.startedDateTime). Use -1 if the timing does not apply to
     * the current request.
     *
     * @var int
     * @Serializer\Type("integer")
     */
    private $onContentLoad;

    /**
     * Page is loaded (onLoad event fired). Number of milliseconds since page
     * load started (page.startedDateTime). Use -1 if the timing does not apply
     * to the current request.
     *
     * @var int
     * @Serializer\Type("integer")
     */
    private $onLoad;

    /**
     * A comment provided by the user or the application.
     *
     * @var string
     * @Serializer\Type("string")
     */
    private $comment;

    /**
     * @return int
     */
    public function getOnContentLoad(): int
    {
        return $this->onContentLoad;
    }

    /**
     * @param int $onContentLoad
     *
     * @return PageTiming
     */
    public function setOnContentLoad(int $onContentLoad): self
    {
        $this->onContentLoad = $onContentLoad;

        return $this;
    }

    /**
     * @return int
     */
    public function getOnLoad(): int
    {
        return $this->onLoad;
    }

    /**
     * @param int $onLoad
     *
     * @return PageTiming
     */
    public function setOnLoad(int $onLoad): self
    {
        $this->onLoad = $onLoad;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return PageTiming
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}