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

/**
 * @author    nystudio107
 * @package   EmptyCoalesce
 * @since     1.0.0
 */

@trigger_error(sprintf('Using the "Twig_Node_Expression_EmptyCoalesce" class is deprecated since Twig version 2.7, use "nystudio107\emptycoalesce\Node\Expression\EmptyCoalesceExpression" instead.'), E_USER_DEPRECATED);

class_exists('nystudio107\emptycoalesce\Node\Expression\EmptyCoalesceExpression');

if (\false) {
    class Twig_Node_Expression_EmptyCoalesce extends EmptyCoalesceExpression
    {
    }
}
