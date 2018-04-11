<?php
/**
 * @file
 * Contains \Drupal\student_entity\Entity\StudentEntity.
 */
namespace Drupal\student_entity\Entity;
use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\student_entity\StudentEntityInterface;
/**
 * Defines a Student configuration entity class.
 *
 * @ConfigEntityType(
 *   id = "student_entity",
 *   label = @Translation("Student Entity"),
 *   fieldable = TRUE,
 *   controllers = {
 *     "list_builder" = "Drupal\student_entity\StudentListBuilder",
 *     "form" = {
 *       "add" = "Drupal\student_entity\Form\StudentForm",
 *       "edit" = "Drupal\student_entity\Form\StudentForm",
 *       "delete" = "Drupal\student_entity\Form\StudentDeleteForm"
 *     }
 *   },
 *   config_prefix = "student_entity",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *      "uuid" = "uuid"
 *   },
 *   links = {
 *     "edit-form" = "student_entity.edit",
 *     "delete-form" = "student_entity.delete"
 *   }
 * )
 */
class StudentEntity extends ConfigEntityBase implements StudentEntityInterface {
  /**
   * The ID of the student_entity.
   *
   * @var string
   */
  public $id;
  /**
   * The student_entity first_name.
   *
   * @var string
   */
  public $first_name;
  /**
   * The student_entity last_name.
   *
   * @var string
   */
  public $last_name;
  /**
   * The number of $faculty_number.
   *
   * @var int
   */
  public $faculty_number;
  /**
   * The gender student_entity .
   *
   * @var string
   */
  public $gender;
}
