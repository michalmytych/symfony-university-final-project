import requests
from colored import fg, bg, attr
from bs4 import BeautifulSoup


class JdoodleScraper:
    def __init__(self):
        self.jdoodle_docs_url = "https://docs.jdoodle.com/compiler-api/compiler-api#what-languages-and-versions-supported"
        self.coding_languages_table_data_attr = "9122d767945a4dec8943fc909f77daea"

    def get_jdoodle_available_coding_languages(self):
        data = self.extract_data_from_source()
        return data

    def get_page_source(self):
        try:
            request = requests.get(self.jdoodle_docs_url)
            return request.text
        except Exception as exception:
            print ('%s%s\n Error while requesting %s %s\n' % (fg('red'), bg('yellow'), self.jdoodle_docs_url, attr('reset')))
            raise exception

    def extract_data_from_source(self):
        source = self.get_page_source()
        soup = BeautifulSoup(source, 'html.parser')
        tables = soup.find_all('table', attrs={
            'data-key': self.coding_languages_table_data_attr
        })
        table = tables[0] if len(tables) else None
        rows = table.find('tbody').find_all('tr')

        lang_name = lang_code = lang_version_index = lang_full_version = "_"
        all_languages = []

        for row_index, row in enumerate(rows):
            if row_index == len(rows) - 1:
                break

            if row_index == 0:
                continue
            else:
                cells = row.find_all("td")
                for cell_index, cell in enumerate(cells):

                    if cell_index == 0:
                        # fetching language name
                        lang_name_column = cell.find("p").find("span").find("span").find("span")
                        new_lang_name = lang_name_column.text
                        # check for zero-width-space character
                        if new_lang_name[0].isalpha():
                            lang_name = new_lang_name

                    if cell_index == 1:
                        # fetching language code
                        lang_code_column = cell.find("p").find("span").find("span").find("span")
                        new_lang_code = lang_code_column.text
                        # check for zero-width-space character
                        if new_lang_code[0].isalpha():
                            lang_code = new_lang_code

                    if cell_index == 2:
                        # fetching language full version
                        lang_full_version_column = cell.find("p").find("span").find("span").find("span")
                        lang_full_version = lang_full_version_column.text

                    if cell_index == 3:
                        # fetching language version index
                        lang_version_index_column = cell.find("p").find("span").find("span").find("span")
                        lang_version_index = lang_version_index_column.text

            all_languages.append({
                "name": lang_name,
                "code": lang_code,
                "full_version": lang_full_version,
                "version_index": lang_version_index
            })

        return all_languages
