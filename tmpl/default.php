<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_contacts_birthday
 *
 * @copyright   (C) 2024 Sergey Kuznetsov
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

//$contacts - массив всех контактов.
if (!$contacts) return;

$today = date("m-d"); //Текущая дата

$contacts_name = []; //Массив с именами контактов

foreach ($contacts as $key => $contact) {
    $name = $contact->name; //Имя контакта
    $birthday = date_format(date_create($contact->created), 'm-d'); //Дата создания контакта
    if ($today == $birthday) array_push($contacts_name, $name); //Если дата создания контакта (ДР) равна текущей дате, то добавляем имя контакта в массив
}
?>

<?php if (!empty($contacts_name)) : ?>
    <div class="contacts-birthday">
        <svg class="ico" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 256 256">
            <path d="M232,112a24,24,0,0,0-24-24H136V79a32.06,32.06,0,0,0,24-31c0-28-26.44-45.91-27.56-46.66a8,8,0,0,0-8.88,0C122.44,2.09,96,20,96,48a32.06,32.06,0,0,0,24,31v9H48a24,24,0,0,0-24,24v23.33a40.84,40.84,0,0,0,8,24.24V200a24,24,0,0,0,24,24H200a24,24,0,0,0,24-24V159.57a40.84,40.84,0,0,0,8-24.24ZM112,48c0-13.57,10-24.46,16-29.79,6,5.33,16,16.22,16,29.79a16,16,0,0,1-32,0ZM40,112a8,8,0,0,1,8-8H208a8,8,0,0,1,8,8v23.33c0,13.25-10.46,24.31-23.32,24.66A24,24,0,0,1,168,136a8,8,0,0,0-16,0,24,24,0,0,1-48,0,8,8,0,0,0-16,0,24,24,0,0,1-24.68,24C50.46,159.64,40,148.58,40,135.33Zm160,96H56a8,8,0,0,1-8-8V172.56A38.77,38.77,0,0,0,62.88,176a39.69,39.69,0,0,0,29-11.31A40.36,40.36,0,0,0,96,160a40,40,0,0,0,64,0,40.36,40.36,0,0,0,4.13,4.67A39.67,39.67,0,0,0,192,176c.38,0,.76,0,1.14,0A38.77,38.77,0,0,0,208,172.56V200A8,8,0,0,1,200,208Z"></path>
        </svg>
        <?= Text::_('MOD_CONTACTS_BIRTHDAY_INTRO_TXT'); ?> <span class="contacts-birthday__name"><?= implode(', ', $contacts_name); ?></span> <?= Text::_('MOD_CONTACTS_BIRTHDAY_SUFFIX_ACTION_TXT'), count($contacts_name) > 1 ? Text::_('MOD_CONTACTS_BIRTHDAY_SUFFIX_PLURAL_TXT') : Text::_('MOD_CONTACTS_BIRTHDAY_SUFFIX_SINGULAR_TXT'), ' ' . Text::_('MOD_CONTACTS_BIRTHDAY_EVENT_TXT') . ' ' . $suffixText ?: ''; ?>
    </div>
<?php endif; ?>