<?php
/**
 * @file
 * Contains \Drupal\student_entity\Form\StudentForm.
 */
namespace Drupal\student_entity\Form;
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Url;
/**
 * Class StudentForm
 *
 * Form class for adding/editing student config entities.
 */
class StudentForm extends EntityForm {
   /**
   * {@inheritdoc}
   */
  public function form(array $form, array &$form_state) {
    $form = parent::form($form, $form_state);
    $entity = $this->entity;
    // Change page title for the edit operation
    if ($this->operation == 'edit') {
      $form['#title'] = $this->t('Edit student: @name', array('@name' => $entity->first_name));
    }
    // The unique machine name of the student.
    $form['id'] = array(
      '#type' => 'machine_name',
      '#maxlength' => EntityTypeInterface::BUNDLE_MAX_LENGTH,
      '#default_value' => $fentity->id,
      '#disabled' => !$entity->isNew(),
      '#machine_name' => array(
        'source' => array('name'),
        'exists' => 'flower_load'
      ),
    );
    // The student name.
    $form['first_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t(' First Name'),
      '#maxlength' => 255,
      '#default_value' => $entity->first_name,
      '#description' => $this->t("Student first name."),
      '#required' => TRUE,
    );
    // The flower color.
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#maxlength' => 255,
      '#default_value' => $entity->last_name,
      '#description' => $this->t("Student last name."),
      '#required' => TRUE,
    );
    // The faculty number.
    $form['$faculty_number'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Faculty number'),
      '#maxlength' => 255,
      '#default_value' => $entity->faculty_number,
      '#description' => $this->t("The student faculty number"),
      '#required' => TRUE,
    );
    // The gender.
    $form['gender'] = array(
      '#type' => 'select',
      '#options' => array(
        'male' => 'male',
        'female' => 'female',
      ),
      '#title' => $this->t('Gender'),
      '#maxlength' => 255,
      '#default_value' => $entity->gender,
      '#description' => $this->t("The student gender."),
      '#required' => TRUE,
    );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function save(array $form, array &$form_state) {
    $entity = $this->entity;
    $status = $entity->save();
    if ($status) {
      // Setting the success message.
      drupal_set_message($this->t('Saved the student: @label.', array(
        '@label' => $entity->name,
      )));
    }
    else {
      drupal_set_message($this->t('The @label student was not saved.', array(
        '@label' => $entity->name,
      )));
    }
    $url = new Url('student_entity.list');
    $form_state['redirect'] = $url->toString();
  }
}
