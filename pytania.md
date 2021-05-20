# Pytania

1. jak obsługiwać błędy w repozytoriach?
    * logowanie błędów na produkcji
    * wyświetlanie błędu w trybie dev
    * czy robić re-throw błędy żeby obsłużyć go w controllerach 
2. Dlaczego nie zadziałała mi nazwa pola encji, tylko nazwa
   kolumny w rekordzie bazy danych
    ``` ->orderBy('post.created_at', 'DESC');```
