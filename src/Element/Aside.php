<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;
use RoyallTheFourth\HtmlDocument\Tag\Standard;

/**
 * Class Aside
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/aside
 */
final class Aside extends AbstractElement implements ParentElementInterface
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
        $this->tag = new Standard('aside', $attributes, $children);
    }

    public function withAttribute(string $name, string $value = null): Aside
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new Aside($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): Aside
    {
        return new Aside($this->attributes, $this->children->add($element));
    }
}
