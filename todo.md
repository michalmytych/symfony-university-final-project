#TO-DO List

1. @ Skończyć wszystkie encje (podstawowe pola)
2. @ Dodać relacje do encji
   * @ dodać past_statuses do solution 
3. @ Dodać data fixtures do każdej encji (bez relacji)
4. Zbudować repozytoria dla każdej encji
5. Zbudować kontrolery
6. Zbudować formularze
7. Dodać relację do fixtures 
8. Zbudować __podstawowe__ widoki
9. Dodać tłumaczenia
10. Zbudować JdoodleService
11. Dodać ostatnie pola do encji
12. Zintegrować JdoodleService z kontrolerami
13. Uzupełnić validacje @Assert\Type itd w encjach, @Assert/NotBLank
14. Co robi fetch="EXTRA_LAZY" w encjach)
15. 

## Dodatkowe
1. Skopiować z SolutionsFixtures wypełnianie relacji referencjami do fixtur innych encji
2. Napisać web-scrapingowy skrypt w pythonie pobierający z Jdoodle
listę wszystkich języków i ich kodów, uruchamiany z kontrolera CodeLanguageController
w którym będzie wywoływany CodeLanguageRepository, który z kolei wprowadzi
języki i ich kody do tabeli code_languages. W razie zmiany struktury tabeli na
jdoodle skrypt musi o tym poinformować. Najlepiej jakby dało się wywołać tą 
funkcję z panelu admina.
   
