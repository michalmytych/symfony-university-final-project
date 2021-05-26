<?php

namespace App\DataFixtures;

use App\Entity\CodeLanguage;
use Doctrine\Persistence\ObjectManager;

class CodeLanguageFixtures extends AbstractBaseFixtures
{
    /**
     * Array of arrays - each of shape [ jdoodle_language_name, jdoodle_language_code ]
     *
     * @const JDOODLE_LANGUAGES_NAMES_AND_CODES
     */
    const JDOODLE_LANGUAGES_NAMES_AND_CODES = [
      ['C',             'c'],
      ['C++ 14',        'cpp14'],
      ['C++ 17',        'cpp17'],
      ['PHP',           'php'],
      ['Java',          'java'],
      ['Python 3',      'python3'],
      ['Ruby',          'ruby'],
      ['C#',            'csharp'],
      ['Dart',          'dart'],
      ['GO Lang',       'go'],
      ['NodeJS',        'nodejs'],
      ['Scala',         'scala'],
      ['Objective C',   'objc'],
      ['Lua',           'lua']
    ];

    /**
     * Loads data fixtures into database.
     * @param ObjectManager $manager
     */
    public function loadData(ObjectManager $manager): void
    {
        foreach (self::JDOODLE_LANGUAGES_NAMES_AND_CODES as $nameAndCode) {
            $codeLanguage = new CodeLanguage();
            $codeLanguage->setName($nameAndCode[0]);
            $codeLanguage->setJdoodleCode($nameAndCode[1]);
            $this->manager->persist($codeLanguage);
        }

        $manager->flush ();
    }
}


