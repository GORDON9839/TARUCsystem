<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
                <title>
                    Programme
                </title>

            </head>
            <body>

                <div class="row">
                <div class="col-6 col-12-xsmall">
                    <xsl:for-each select="/ProgrammesList/Programme">
                        <table>
                            <tr><td>Programme Code </td><td><xsl:value-of select="@programme_code"/></td></tr>
                            <tr><td>Programme Name </td><td><xsl:value-of select="programme_name"/></td></tr>
                            <tr><td>Programme Description</td><td><xsl:value-of select="programme_desc"/></td></tr>
                            <tr><td>Duration(Full Time)  </td><td><xsl:value-of select="fulltime_duration"/></td></tr>
                            <tr><td>Duration(Part Time)  </td><td><xsl:value-of select="parttime_duration"/></td></tr>
                            <tr><td>Faculty  </td><td><xsl:value-of select="faculty"/></td></tr>
                            <tr><td>Professional Certification</td><td><xsl:value-of select="profcer"/></td></tr>
                            <tr><td>Minimmum Entry Requirement (SPM)</td><td><xsl:value-of select="MER_SPM"/></td></tr>
                            <tr><td>Minimmum Entry Requirement (STPM)</td><td><xsl:value-of select="MER_STPM"/></td></tr>
                            <tr><td>Minimmum Entry Requirement (UEC) </td><td><xsl:value-of select="MER_UEC"/></td></tr>
                            <tr><td>Minimmum Entry Requirement Description </td><td><xsl:value-of select="MER_desc"/></td></tr><br></br>
                    </table>



<!--                </xsl:if>-->
                    </xsl:for-each>
                </div>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
