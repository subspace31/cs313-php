alter table categories add column description text;

update categories set description = 'What Chalkboard Art is and why people should buy it. 3-5 sentences.' where category = 'Chalkboard Art';
update categories set description = 'What Painted Heirlooms are and why people should buy it. 3-5 sentences.' where category = 'Painted Heirlooms';
update categories set description = 'What Custom Orders are and why people should buy it. 3-5 sentences.' where category = 'Custom Orders';
update categories set description = 'What Home Remedies are and why people should buy it. 3-5 sentences.' where category = 'Home Remedies';
update categories set description = 'What Herblore Classes are and why people should buy it. 3-5 sentences.' where category = 'Herblore Classes';
