<?php

namespace Content\Model\Lesson;

use Zend\Form\Annotation;

/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("LessonRequest")
 */
class Request
{
    /**
     * @Annotation\AllowEmpty
     *
     * @var int
     */
    public $id;

    /**
     * @Annotation\AllowEmpty
     *
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Full Name"})
     * @Annotation\Attributes({"class":"form-name form-control"})
     */
    public $name;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Phone"})
     * @Annotation\Attributes({"class":"form-control"})
     */
    public $phone;

    /**
     * @Annotation\Type("Zend\Form\Element\Text")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\AllowEmpty
     * @Annotation\Options({"label":"Email"})
     * @Annotation\Attributes({"class":"form-control"})
     */
    public $email;

    /**
     * @Annotation\Type("Zend\Form\Element\Textarea")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\AllowEmpty
     * @Annotation\Options({"label":"Comment"})
     * @Annotation\Attributes({"class":"form-comment form-control"})
     */
    public $comment;

    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\AllowEmpty
     * @Annotation\Attributes({"value":"Submit"})
     */
    public $submit;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param  array $data
     * @return $this
     */
    public function setData(array $data)
    {
        foreach ($data as $field => $value) {
            $methodName = 'set' . ucfirst($field);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
        $this->setCreatedAt(new \DateTime());
        return $this;
    }
}
