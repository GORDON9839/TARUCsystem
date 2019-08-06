<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="text"/>
    <xsl:template match="/">
        <xsl:value-of select="count(//FacultyStaff)"/> Staff Found and

        <xsl:value-of select="count(//FacultyStaff[role='admin'])"/> Admin in faculty
    </xsl:template>

</xsl:stylesheet>
