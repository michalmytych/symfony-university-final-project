from JdoodleScraper import JdoodleScraper
import json

scraper = JdoodleScraper()

print(
    json.dumps(
        scraper.get_jdoodle_available_coding_languages()
    )
)
