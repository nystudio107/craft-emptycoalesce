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

namespace nystudio107\emptycoalesce\Node\Expression;

use Twig\Compiler;
use Twig\Node\Expression\AbstractExpression;
use Twig\Node\Node;

/**
 * @author    nystudio107
 * @package   EmptyCoalesce
 * @since     1.0.0
 *
 */
class EmptyCoalesceExpression extends AbstractExpression
{

    public function __construct(Node $left, Node $right, $lineno)
    {
        $left->setAttribute('ignore_strict_check', true);
        $left->setAttribute('is_defined_test', false);
        $right->setAttribute('ignore_strict_check', true);
        $right->setAttribute('is_defined_test', false);
        parent::__construct(
            ['left' => $left, 'right' => $right],
            ['ignore_strict_check' => true, 'is_defined_test' => false],
            $lineno
        );
    }

    public function compile(Compiler $compiler)
    {
        //$this->getNode('expr1')->setAttribute('always_defined', true);
        $compiler
            ->raw('((empty(')
            ->subcompile($this->getNode('left'))
            ->raw(') ? null : ')
            ->subcompile($this->getNode('left'))
            ->raw(') ?? (empty(')
            ->subcompile($this->getNode('right'))
            ->raw(') ? null : ')
            ->subcompile($this->getNode('right'))
            ->raw('))')
        ;
    }
}

class_alias('nystudio107\emptycoalesce\Node\Expression\EmptyCoalesceExpression', 'Twig_Node_Expression_EmptyCoalesce');
