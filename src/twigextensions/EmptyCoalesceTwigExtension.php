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

namespace nystudio107\emptycoalesce\twigextensions;

use nystudio107\emptycoalesce\Node\Expression\EmptyCoalesceExpression;

use Twig\ExpressionParser;
use Twig\Extension\AbstractExtension;

/**
 * @author    nystudio107
 * @package   EmptyCoalesce
 * @since     1.0.0
 */
class EmptyCoalesceTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'EmptyCoalesce';
    }

    /**
     * @inheritdoc
     */
    public function getFilters(): array
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function getFunctions(): array
    {
        return [
        ];
    }

    /**
     * @return array<int, mixed[]>
     */
    public function getOperators(): array
    {
        return [
            // Unary operators
            [],
            // Binary operators
            [
                '???' => [
                    'precedence' => 300,
                    'class' => EmptyCoalesceExpression::class,
                    'associativity' => ExpressionParser::OPERATOR_RIGHT
                ],
            ],
        ];
    }
}
