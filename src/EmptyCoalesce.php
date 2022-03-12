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

namespace nystudio107\emptycoalesce;

use nystudio107\emptycoalesce\twigextensions\EmptyCoalesceTwigExtension;

use Craft;
use craft\base\Plugin;

/**
 * Class EmptyCoalesce
 *
 * @author    nystudio107
 * @package   EmptyCoalesce
 * @since     1.0.0
 *
 */
class EmptyCoalesce extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var EmptyCoalesce
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public string $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        Craft::$app->view->registerTwigExtension(new EmptyCoalesceTwigExtension());

        Craft::info(
            Craft::t(
                'empty-coalesce',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }
}
