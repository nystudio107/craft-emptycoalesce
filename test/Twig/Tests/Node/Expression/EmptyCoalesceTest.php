<?php
/**
 * Empty Coalesce plugin for Craft CMS 3.x
 *
 * Empty Coalesce adds the ??? operator to Twig that will return the first thing
 * that is defined, not null, and not empty.
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2018 nystudio107
 */

use nystudio107\emptycoalesce\Node\Expression\EmptyCoalesceExpression;

use Twig\Node\Expression\ConstantExpression;
use Twig\Node\Expression\NameExpression;
use Twig\Test\NodeTestCase;

/**
 * @author    nystudio107
 * @package   EmptyCoalesce
 * @since     1.0.0
 *
 */
class Twig_Tests_Node_Expression_EmptyCoalesceTest extends NodeTestCase
{
    public function getTests()
    {
        $left = new NameExpression('foo', 1);
        $right = new ConstantExpression(2, 1);
        $node = new EmptyCoalesceExpression($left, $right, 1);

        return array(array($node, "((".EmptyCoalesceExpression::class."::empty(// line 1\n(\$context[\"foo\"] ?? null)) ? null : (\$context[\"foo\"] ?? null)) ?? (".EmptyCoalesceExpression::class."::empty(2) ? null : 2))"));
    }
}
