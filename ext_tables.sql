#
# Create the needed extra column
#
CREATE TABLE pages (
  tx_opengraph_active tinyint(1) DEFAULT '0' NOT NULL
  tx_opengraph_type varchar(255) DEFAULT '' NOT NULL
  tx_opengraph_image varchar(255) DEFAULT '' NOT NULL
  tx_opengraph_additional varchar(255) DEFAULT '' NOT NULL
);