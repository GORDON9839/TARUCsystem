<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

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
                    <ul class="alt">
                        <li>Programme Code &#160;&#160;&#160;&#160;&#160;<xsl:value-of select="@programme_code"/></li>
                        <li>Programme Name &#160;&#160;&#160;&#160;&#160;<xsl:value-of select="programme_name"/></li>
                        <li>Programme Description&#160;&#160;&#160;&#160;<xsl:value-of select="programme_desc"/></li>
                        <li>Duration(Full Time)  &#160;&#160;&#160;&#160;<xsl:value-of select="fulltime_duration"/></li>
                        <li>Duration(Part Time)  &#160;&#160;&#160;&#160;<xsl:value-of select="parttime_duration"/></li>
                        <li>Faculty  &#160;&#160;&#160;&#160;&#160;&#160;<xsl:value-of select="faculty"/></li>
                        <li>Professional Certification &#160;&#160;&#160;<xsl:value-of select="profcer"/></li>
                        <li>Minimmum Entry Requirement (SPM) &#160;&#160;<xsl:value-of select="MER_SPM"/></li>
                        <li>Minimmum Entry Requirement (STPM)&#160;&#160;<xsl:value-of select="MER_STPM"/></li>
                        <li>Minimmum Entry Requirement (UEC) &#160;&#160;;<xsl:value-of select="MER_UEC"/></li>
                        <li>Minimmum Entry Requirement Description &#160;<xsl:value-of select="MER_desc"/></li><br></br>
                        <ul class="actions">
                        <li>
                            <a href="#" class="button primary">Modify</a>
                        </li>
                        <li>
                            <a href="#" class="button">Delete</a>
                        </li>
                        </ul>

                    </ul>
<!--                </xsl:if>-->
                    </xsl:for-each>
                </div>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
