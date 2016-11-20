<?php

namespace RoyallTheFourth\HtmlDocument\Element;

use RoyallTheFourth\HtmlDocument\Attribute\BooleanAttribute;
use RoyallTheFourth\HtmlDocument\Attribute\StandardAttribute;
use RoyallTheFourth\HtmlDocument\Set\AttributeSet;
use RoyallTheFourth\HtmlDocument\Set\ElementSet;

/**
 * Class DataList
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/datalist
 */
final class DataList extends AbstractElement
{
    public function __construct(AttributeSet $attributes = null, ElementSet $children = null)
    {
        $this->attributes = $attributes ?? new AttributeSet();
        $this->children = $children ?? new ElementSet();
    }

    public function render(): string
    {
        $attributes = $this->renderAttributes();
        $children = $this->renderChildren();

        return "<datalist{$attributes}>{$children}\n</datalist>\n";
    }

    public function withAttribute(string $name, string $value = null): DataList
    {
        if ($value) {
            $attribute = new StandardAttribute($name, $value);
        } else {
            $attribute = new BooleanAttribute($name);
        }

        return new DataList($this->attributes->add($attribute), $this->children);
    }

    public function withChild(ElementInterface $element): DataList
    {
        return new DataList($this->attributes, $this->children->add($element));
    }
}
