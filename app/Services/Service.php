<?php

namespace App\Services;

use App\Contracts\Models;

class Service
{
    /**
     * @var userInterface
     */
    protected $userInterface;

    /**
     * @var roleInterface
     */
    protected $roleInterface;

    /**
     * @var bookInterface
     */
    protected $bookInterface;

    /**
     * @var auditInterface
     */
    protected $auditInterface;

    /**
     * @var gradeInterface
     */
    protected $gradeInterface;

    /**
     * @var authorInterface
     */
    protected $authorInterface;

    /**
     * @var languageInterface
     */
    protected $languageInterface;

    /**
     * @var publisherInterface
     */
    protected $publisherInterface;

    /**
     * @var permissionInterface
     */
    protected $permissionInterface;

    /**
     * @var applicationInterface
     */
    protected $applicationInterface;

    /**
     * @var bookCategoryInterface
     */
    protected $bookCategoryInterface;

    /**
     * Model contract constructor.
     *
     * @param  \App\Contracts\Models\UserInterface  $userInterface
     * @param  \App\Contracts\Models\RoleInterface  $roleInterface
     * @param  \App\Contracts\Models\BookInterface  $bookInterface
     * @param  \App\Contracts\Models\AuditInterface  $auditInterface
     * @param  \App\Contracts\Models\GradeInterface  $gradeInterface
     * @param  \App\Contracts\Models\AuthorInterface  $authorInterface
     * @param  \App\Contracts\Models\LanguageInterface  $languageInterface
     * @param  \App\Contracts\Models\PublisherInterface  $publisherInterface
     * @param  \App\Contracts\Models\PermissionInterface  $permissionInterface
     * @param  \App\Contracts\Models\ApplicationInterface  $applicationInterface
     * @param  \App\Contracts\Models\BookCategoryInterface  $bookCategoryInterface
     */
    public function __construct(
        Models\UserInterface $userInterface,
        Models\RoleInterface $roleInterface,
        Models\BookInterface $bookInterface,
        Models\AuditInterface $auditInterface,
        Models\GradeInterface $gradeInterface,
        Models\AuthorInterface $authorInterface,
        Models\LanguageInterface $languageInterface,
        Models\PublisherInterface $publisherInterface,
        Models\PermissionInterface $permissionInterface,
        Models\ApplicationInterface $applicationInterface,
        Models\BookCategoryInterface $bookCategoryInterface,
    ) {
        $this->userInterface = $userInterface;
        $this->roleInterface = $roleInterface;
        $this->bookInterface = $bookInterface;
        $this->auditInterface = $auditInterface;
        $this->gradeInterface = $gradeInterface;
        $this->authorInterface = $authorInterface;
        $this->languageInterface = $languageInterface;
        $this->publisherInterface = $publisherInterface;
        $this->permissionInterface = $permissionInterface;
        $this->applicationInterface = $applicationInterface;
        $this->bookCategoryInterface = $bookCategoryInterface;
    }
}
