FROM php:7.4-apache 
COPY . /var/www/html/ 
RUN chown -R www-data:www-data /var/www/html 
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf 
EXPOSE 8080 
CMD ["apache2-foreground"] 
