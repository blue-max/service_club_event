<?php

namespace Drupal\service_club_event;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Volunteer registration entities.
 *
 * @ingroup service_club_event
 */
class VolunteerRegistrationListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Volunteer registration ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\service_club_event\Entity\VolunteerRegistration */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.volunteer_registration.edit_form',
      ['volunteer_registration' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
