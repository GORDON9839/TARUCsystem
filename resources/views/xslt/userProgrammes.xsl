<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xml.apache.org/xslt ">
    <xsl:template match="/">
        <xsl:value-of select="count(//Programme)"/>
    </xsl:template>

</xsl:stylesheet>
