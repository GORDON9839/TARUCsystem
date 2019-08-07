
<!--    Author: Jack Soh Boon Keat-->
<!--    Author Student ID: 18WMU08324-->

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="text"/>
    <xsl:template match="/">
        <xsl:value-of select="count(//staff)"/> Staff Found and
        <xsl:value-of select="count(//staff[role='admin'])"/> Admin found
    </xsl:template>
</xsl:stylesheet>
