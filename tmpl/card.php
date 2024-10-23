<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_contacts_birthday
 *
 * @copyright   (C) 2024 Sergey Kuznetsov
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Joomla\CMS\Router\Route;
use Joomla\Component\Contact\Site\Helper\RouteHelper;
use Joomla\CMS\Layout\LayoutHelper;

defined('_JEXEC') or die;

//$contacts - массив всех контактов.

$today = date("m-d"); //Текущая дата

foreach ($contacts as $key => $contact) :
    $birthday = date_format(date_create($contact->created), 'm-d');
    $contact->slug = $contact->id . ':' . $contact->alias;
    $contact->link = Route::_(RouteHelper::getContactRoute($contact->slug, $contact->catid));
    if ($today == $birthday) :
?>
        <div class="contact-birthday-card">
            <?php echo LayoutHelper::render(
                'joomla.html.image',
                [
                    'src' => $contact->image,
                    'alt' => $contact->name,
                    'class' => 'contact-birthday-card__img'
                ]
            ); ?>
            <div class="contact-birthday-card__body">
                <a href="<?= $contact->link; ?>" class="contact-birthday-card__name"><?= $contact->name; ?></a>
                <?php if (!empty($contact->con_position)) : ?>
                    <span class="contact-birthday-card__position"><?= $contact->con_position; ?></span>
                <?php endif; ?>
            </div>
        </div>
<?php
    endif;
endforeach; ?>