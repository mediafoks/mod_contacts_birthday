<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_contacts_birthday
 *
 * @copyright   (C) 2024 Sergey Kuznetsov
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\ContactsBirthday\Site\Helper;

use Joomla\Database\DatabaseAwareInterface;
use Joomla\Database\DatabaseAwareTrait;

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Helper for mod_contacts_birthday
 *
 * @since  2.0.0
 */
class ContactsBirthdayHelper implements DatabaseAwareInterface
{
    use DatabaseAwareTrait;

    public function getContacts($params): array
    {
        $db = $this->getDatabase();

        $catId = join(',', $params->get('catid'));

        // Retrieve the shout
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__contact_details'))
            ->where("published='1'")
            ->where("catid IN (" . $catId . ")");
        // Prepare the query

        $db->setQuery($query);
        // Load the row.
        $result = $db->loadObjectList();
        // Return the result
        return $result;
    }
}
