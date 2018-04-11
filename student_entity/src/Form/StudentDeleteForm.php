<?php
/**
 * @file
 * Contains \Drupal\student_entity\Form\StudentDeleteForm.
 */
namespace Drupal\student_entity\Form;
use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Url;
/**
 * Form that handles the removal of student entities.
 */
class StudentDeleteForm extends EntityConfirmFormBase {
  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete this student: @name?', array('@name' => $this->entity->first_name.' '.$this->entity->last_name));
  }
  /**
   * {@inheritdoc}
   */
  public function getCancelRoute() {
    return new Url('student_entity.list');
  }
  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }
  /**
   * {@inheritdoc}
   */
  public function submit(array $form, array &$form_state) {
    // Delete and set message
    $this->entity->delete();
    drupal_set_message($this->t('The student @name has been deleted.', array('@name' => $this->entity->first_name.' '.$this->entity->last_name)));
    $form_state['redirect_route'] = $this->getCancelRoute();
  }
}
