#SYSTEM AUTOMATYCZNEGO SPRAWDZANIA ZADAŃ ALGORYTMICZNYCH
### Opis funkcjonalności
Aplikacja pozwala na tworzenie kont typu Nauczyciel lub typu Student w systemie.
Użytkownik o roli nauczyciela może tworzyć kursy oraz powiązane z nimi grupy
ćwiczeniowe, do których może dodawać uczestników - użytkowników posiadających konto
typu Student. W ramach kursu/grupy nauczyciel może dodawać zadania programistyczne
oraz testy do nich (zbiór danych wejściowych i odpowiadających im poprawnych danych
wyjściowych programu). Zadania mają formę podobną do problemów algorytmicznych z
konkursów Google CodeJam lub HashCode.
Posiadacze kont typu Student mogą akceptować zaproszenia do kursów lub grup i
wykonywać zadania dodane przez nauczycieli. 
___
Proces oceny zadania będzie przebiegał w
następujący sposób:
1. Wklejenie kodu rozwiązania do formularza w panelu Studenta przez użytkownika
   typu Student (lub dodanie rozwiązania jako pliku).
2. Wstępna weryfikacja rozwiązania - czy rozwiązanie nie przekracza limitu
   znaków/rozmiaru pliku.
3. Dodanie rozwiązania do bazy danych.
4. Przesłanie rozwiązania przez serwer do zewnętrznego serwisu zajmującego się
   bezpiecznym kompilowaniem i uruchomieniem kodu programów komputerowych,
   wraz z danymi wejściowymi.
5. Odebranie odpowiedzi od zdalnego serwisu.
6. Sprawdzenie, czy długość wykonania zadania i ilość wykorzystanej pamięci nie
   przekroczyły określonych dla zadania limitów.
7. Porównanie outputu rozwiązania z określonymi dla zadania poprawnymi
   odpowiedziami.
8. Informacje na temat każdego z kroków 3 do 7 będą na bieżąco zapisywane w bazie
   danych (status) i wyświetlane w elemencie html imitującym konsolę.
9. Po zakończeniu procesu automatycznej oceny, Nauczyciel będzie dodawał
   komentarz do rozwiązania studenta i wystawiał ostateczną ocenę.
   Zewnętrzny serwis który chciałbym wykorzystać do obsługi kompilacji i uruchamiania
   kodu rozwiązań to interfejs API Jdoodle. Autoryzacja żądań będzie przeprowadzana przez
   dołączanie do nich identyfikatora CLIENT_ID oraz tokena CLIENT_SECRET. Połączenie z
   API chciałbym realizować przez klasę-serwis wykorzystującą cURL.
   Dodatkowo serwis umożliwia Nauczycielom dodawanie, edycję i usuwanie postów na
   tablicach kursów i grup, Studentom oraz nauczycielom na przeglądanie rankingu kursów i
   grup, oraz edytowanie ustawień swojego konta i profilu.
   
___

### Model bazy danych

![poprawiony_model_projektu_SI](https://user-images.githubusercontent.com/59512535/119892875-f5eeac00-bf3a-11eb-969a-c71255e22854.png)
