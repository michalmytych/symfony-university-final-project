<?php

namespace App\Repository;

use App\Entity\CodeLanguage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Psr\Log\LoggerInterface;

/**
 * Class CodeLanguageRepository
 *
 * @package App\Repository
 */
class CodeLanguageRepository extends ServiceEntityRepository
{
    private LoggerInterface $logger;

    public function __construct(ManagerRegistry $registry, LoggerInterface $logger)
    {
        parent::__construct($registry, CodeLanguage::class);
        $this->logger = $logger;
    }

    /**
     * Method for saving list of coding languages
     * which are currently available at Jdoodle
     * external service.
     *
     * @param CodeLanguage $codeLanguage
     */
    public function saveMultiple(CodeLanguage $codeLanguage) : void
    {
        /**
         * Metoda repozytorium wywoływana z controllera dla ednpointa API Json
         *
         * @todo - dobre praktyki co do tego jak zapisywać w bazie wiele encji naraz (foreach, gdze obsluga bledow?, czy z transakcją?)
         */
    }

    /**
     * Method for updating list of coding languages
     * which are currently available at Jdoodle
     * external service.
     *
     * @param CodeLanguage $codeLanguage
     */
    public function updateMultiple(CodeLanguage $codeLanguage) : void
    {
        /**
         * Metoda repozytorium wywoływana z controllera dla ednpointa API Json
         *
         * @todo - trzeba porownac poprzedni stan tabeli, zeby poinformowac admina o ewentualnych zmianach w konfiguracji języków
         */
    }
}
