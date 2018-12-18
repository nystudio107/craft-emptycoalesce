<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Twig_Node_Expression_EmptyCoalesce extends \Twig_Node_Expression
{

    public function __construct(Twig_Node $left, Twig_Node $right, $lineno)
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

    public function compile(\Twig_Compiler $compiler)
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

class_alias('Twig_Node_Expression_EmptyCoalesce', 'nystudio107\seomatic\Node\Expression\EmptyCoalesceExpression', false);
