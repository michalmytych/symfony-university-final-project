from JdoodleScraper import JdoodleScraper
import json

"""
    Minimal server config for hosting this microservice with apache2:
    https://www.codementor.io/@abhishake/minimal-apache-configuration-for-deploying-a-flask-app-ubuntu-18-04-phu50a7ft
"""

scraper = JdoodleScraper()

print(
    json.dumps(
        scraper.get_jdoodle_available_coding_languages()
    )
)
