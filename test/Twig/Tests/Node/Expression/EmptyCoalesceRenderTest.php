<?php
/**
 * Empty Coalesce plugin for Craft CMS
 *
 * Empty Coalesce adds the ??? operator to Twig that will return the first thing
 * that is defined, not null, and not empty.
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2018 nystudio107
 */

use nystudio107\emptycoalesce\twigextensions\EmptyCoalesceTwigExtension;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\ArrayLoader;

/**
 * Renders templates through a plain Twig environment with the `???` operator
 * and checks that each operand is evaluated once, plus the documented semantics.
 *
 * @author    nystudio107
 * @package   EmptyCoalesce
 * @since     5.0.2
 */
class Twig_Tests_Node_Expression_EmptyCoalesceRenderTest extends TestCase
{
    public function testOperandsAreEvaluatedOnce(): void
    {
        $left = new EmptyCoalesceCounter('foo');
        $right = new EmptyCoalesceCounter('bar');
        $this->assertSame('foo', $this->render('{{ left.value() ??? right.value() }}', compact('left', 'right')));
        $this->assertSame(1, $left->calls);
        $this->assertSame(0, $right->calls);

        $left = new EmptyCoalesceCounter('');
        $right = new EmptyCoalesceCounter('bar');
        $this->assertSame('bar', $this->render('{{ left.value() ??? right.value() }}', compact('left', 'right')));
        $this->assertSame(1, $left->calls);
        $this->assertSame(1, $right->calls);
    }

    public function testChainedOperandsAreEvaluatedOnce(): void
    {
        $first = new EmptyCoalesceCounter([]);
        $second = new EmptyCoalesceCounter('');
        $third = new EmptyCoalesceCounter('baz');
        $this->assertSame(
            'baz',
            $this->render('{{ first.value() ??? second.value() ??? third.value() ??? "fallback" }}', compact('first', 'second', 'third'))
        );
        $this->assertSame(1, $first->calls);
        $this->assertSame(1, $second->calls);
        $this->assertSame(1, $third->calls);
    }

    public function testEmptyCoalesceSemantics(): void
    {
        $this->assertSame('bark', $this->render('{{ woof ??? bar ??? foo ??? baz ??? "bark" }}', [
            'bar' => null,
            'foo' => '',
            'baz' => [],
        ]));
        $this->assertSame('foo', $this->render('{{ "foo" ??? "bar" }}'));
        $this->assertSame('0', $this->render('{{ 0 ??? "bar" }}'));
        $this->assertSame('bar', $this->render('{{ false ??? "bar" }}'));
        $this->assertSame('bar', $this->render('{{ obj ??? "bar" }}', ['obj' => new EmptyCoalesceCounter('')]));
        $this->assertSame('bar', $this->render('{{ items ??? "bar" }}', ['items' => new \ArrayObject()]));
        $this->assertSame('1,x,3', $this->render('{{ [1, "", 3]|map(v => v ??? "x")|join(",") }}'));
        $this->assertSame('null', $this->render('{{ (woof ??? "") is null ? "null" : "not null" }}'));
    }

    protected function render(string $template, array $variables = []): string
    {
        $twig = new Environment(new ArrayLoader(['test' => $template]), [
            'strict_variables' => true,
            'cache' => false,
        ]);
        $twig->addExtension(new EmptyCoalesceTwigExtension());

        return $twig->render('test', $variables);
    }
}

class EmptyCoalesceCounter
{
    public int $calls = 0;

    public function __construct(public mixed $result)
    {
    }

    public function value(): mixed
    {
        $this->calls++;

        return $this->result;
    }

    public function __toString(): string
    {
        return (string)$this->result;
    }
}
