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
use Twig\Environment;
use Twig\ExpressionParser;
use Twig\ExpressionParser\Infix\BinaryOperatorExpressionParser;
use Twig\ExpressionParser\InfixAssociativity;
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
     * @return array
     */
    public function getOperators(): array
    {
        // Twig 3.21 and later deprecate this function in favor of getExpressionParsers()
        // @phpstan-ignore greater.alwaysTrue
        if (Environment::VERSION_ID > 32100) {
            return [[], []];
        }
        // Older versions of Twig
        // @phpstan-ignore-next-line
        return [
            // Unary operators
            [],
            // Binary operators
            [
                '???' => [
                    'precedence' => 300,
                    'class' => \nystudio107\seomatic\Node\Expression\EmptyCoalesceExpression::class,
                    'associativity' => ExpressionParser::OPERATOR_RIGHT,
                ],
            ],
        ];
    }

    /**
     * Added for Twig 3.21+ support to remove deprecation errors
     *
     * @return BinaryOperatorExpressionParser[]
     */
    public function getExpressionParsers(): array
    {
        return [
            new BinaryOperatorExpressionParser(
            // phpstan wants an explicit class-string<Twig\Node\Expression\Binary\AbstractBinary>
            // But that wasn't introduced until Twig 3.21
            // @phpstan-ignore-next-line
                EmptyCoalesceExpression::class,
                '???',
                300,
                InfixAssociativity::Right),
        ];
    }
}
