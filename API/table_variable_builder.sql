SELECT 
COLUMN_NAME,
DATA_TYPE,
CONCAT('public ',
      	(
        	CASE WHEN DATA_TYPE = 'varchar' OR DATA_TYPE = 'longtext' THEN 'string'
            WHEN DATA_TYPE = 'bit' THEN 'bool' 
            WHEN DATA_TYPE = 'date' OR DATA_TYPE = 'datetime' OR DATA_TYPE = 'time' THEN 'DateTime?'
            ELSE DATA_TYPE
            END
        ),
       ' ',
       COLUMN_NAME,
       ' { get; set; }'
      ) as csModel,
CONCAT (
    'this.',
    COLUMN_NAME,
    ' = ',
    table_name,
    '.',
    COLUMN_NAME,
    ';'
) as nodeModel
FROM INFORMATION_SCHEMA.COLUMNS 
  WHERE table_name = 'datacenter'
GROUP BY COLUMN_NAME